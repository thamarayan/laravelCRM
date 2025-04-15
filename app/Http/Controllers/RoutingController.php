<?php

namespace App\Http\Controllers;

use App\Models\ClientPSP;
use App\Models\PspList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class routingController extends Controller
{

    public function merchants_index(Request $request)
    {

        $query = ClientPSP::whereIn('enabled', ['Yes', 'No']);

        if ($request->has('search') && !empty($request->search)) {
            $query->where('client', 'LIKE', '%' . $request->search . '%');
        }

        $clientsConfig = $query->get();
        $pspList = PspList::get();

        foreach ($clientsConfig as $client) {
            $client->velocities = json_decode(data_get($client, 'velocities', '[]'), true);
            $client->configuration = json_decode(data_get($client, 'configuration', '[]'), true);
            $client->client = ucfirst($client->client);

            $successValue = null;
            $failedValue = null;
            $incompleteValue = null;

            foreach ($client->velocities as $velocity) {
                if (isset($velocity['success'])) {
                    $successValue = $velocity['success']; // Store success value
                }
                if (isset($velocity['failed'])) {
                    $failedValue = $velocity['failed']; // Store failed value
                }
                if (isset($velocity['incomplete'])) {
                    $incompleteValue = $velocity['incomplete']; // Store failed value
                }
            }

            $client->successValue = $successValue ?? 0;
            $client->failedValue = $failedValue ?? 0;
            $client->incompleteValue = $incompleteValue ?? 0;
            $client->payment_bank = $client->pspDetails->bank ?? '';
        }

        if ($request->ajax()) {
            return response()->json(['clients' => $clientsConfig, 'pspList' => $pspList]);
        }

        return view('routings.merchants', compact('clientsConfig', 'pspList'));
    }

    public function updateVelocities_agents(Request $request)
    {
        $implode_velocities = json_encode($request->velocities, true);
        Log::info($implode_velocities);
        $response = ClientPSP::where('client', $request->client)->update(['velocities' => $implode_velocities]);
        Log::info($response);
        return $response;
    }

    public function addMerchantConfig(Request $request)
    {
        Log::info($request->client_id);
        $configData = ClientPSP::where('client', $request->client_id)->get('configuration')->first();
        $existingConfig = json_decode($configData['configuration'], true) ?? [];

        Log::info($existingConfig);

        $newConfig = $request->newConfig;

        Log::info($newConfig);

        $updatedConfig = array_merge($existingConfig, $newConfig);

        Log::info($updatedConfig);

        $finalConfig = json_encode($updatedConfig);

        $result = ClientPSP::where('client', $request->client_id)->update(['configuration' => $finalConfig]);

        if ($result) {
            return response()->json(['message' => 'Configuration Added successfully.']);
        } else {
            Log::info($result);
        }
    }

    public function updateMerchantConfig(Request $request)
    {
        Log::info($request->client_id);
        $configData = ClientPSP::where('client', $request->client_id)->get('configuration')->first();
        $existingConfig = json_decode($configData['configuration'], true);

        $newConfig = $request->newConfig;

        foreach ($existingConfig as &$oldConfig) {
            foreach ($newConfig as $new) {
                if ($oldConfig['bank'] === $new['bank']) {
                    $oldConfig = array_merge($oldConfig, $new);
                }
            }
        }

        Log::info("Updated Config");
        Log::info($existingConfig);

        $finalConfig = json_encode($existingConfig);

        $result = ClientPSP::where('client', $request->client_id)->update(['configuration' => $finalConfig]);

        if ($result) {
            return response()->json(['message' => 'Configuration updated successfully.']);
        } else {
            Log::info($result);
        }
    }

    public function deleteBank($id, $client)
    {
        Log::info($id);
        Log::info($client);

        $clientConfig = ClientPSP::where('client', $client)->get('configuration');

        $configData = json_decode($clientConfig, true) ?? [];
        $existingConfig = json_decode($configData[0]['configuration'], true);

        foreach ($existingConfig as $key => $oldConfig) {
            if ($oldConfig['bank'] === $id) {
                unset($existingConfig[$key]);
            }
        }

        $existingConfig = array_values($existingConfig);

        $updatedConfig = json_encode($existingConfig);
        $result = ClientPSP::where('client', $client)->update(['configuration' => $updatedConfig]);
        return $result;
    }

    public function enableDisableClient(Request $request)
    {
        $client = ClientPSP::where('client', $request->client_id)->get()->first;
        $enabled = $request->input('enabled');

        Log::info($enabled);

        $result = ClientPSP::where('client', $request->client_id)->update([
            'enabled' => $enabled
        ]);

        if ($result) {
            return response()->json(['message' => 'Toggle status updated']);
        } else {
            Log::info($result);
        }
    }

    public function psp_index(Request $request)
    {
        $query = PspList::query(); // or: PspList::where(...)

        if ($request->has('search') && !empty($request->search)) {
            $query->where('bank', 'LIKE', '%' . $request->search . '%');
        }

        $pspsConfig = $query->get();

        $clientConfig = ClientPSP::get()->all();

        $finalPsps = [];

        foreach ($pspsConfig as $psp) {

            $banksConfigured = [];

            foreach ($clientConfig as $client) {
                $clientName = $client->client;
                $decodedConfig = json_decode($client->configuration, true);

                if (empty($decodedConfig)) {
                    continue;
                }

                foreach ($decodedConfig as $index => $config) {
                    if (!isset($config['bank'])) {
                        continue;
                    }

                    $bankConfig = $config['bank'];

                    $match = false;
                    if (is_array($bankConfig)) {
                        $match = in_array($psp->bank, $bankConfig);
                    } elseif (is_string($bankConfig)) {
                        $match = trim(strtolower($psp->bank)) === trim(strtolower($bankConfig));
                    }

                    if ($match) {
                        $banksConfigured[] = $clientName;
                        break; // optional: only add once per client
                    }
                }
            }

            $finalPsps[] = [
                'psp' => $psp->bank,
                'configuredBanks' => $banksConfigured,
            ];
        }

        // Log::info("🎯 Final PSPs",  $finalPsps);


        if ($request->ajax()) {
            return response()->json(['psps' => $pspsConfig, 'finalPsps' => $finalPsps]);
        }

        return view('routings.psps', compact('pspsConfig'));
    }
}
