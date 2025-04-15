<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayOrdersModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'orderId';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'fullName',
        'email',
        'phone',
        'amount',
        'currency',
        'country',
        'street1',
        'city',
        'state',
        'postal_code',
        'invoiceNumber',
        'comments',
        'orderStatus',
        'orderMessage',
        'transactionID',
        'orderDate',
        'orderPaid',
        'paymentMethod',
        'report',
        'interchange',
        'fee_scheme_fee',
        'service_fee',
        'card_type',
        'bank_name',
        'descriptor',
        'mid',
        'merchantName',
        'chargeback_date',
        'decline_date',
        'cardnum',
        'included_in_report',
        'meps_profile_id',
        'chargeback_callbackurl',
        'fraud_callbackurl',
        'refund_callbackurl',
        'status_url',
        'redirect_url',
        'chargeback_callback',
        'fraud_callback',
        'refund_callback',
        'banks_mid',
        'return_url',
        'mode',
        'refund_amount',
        'psp_time',
        'ARN_Number',
        'api_test',
        'partial_amount',
        'paid_by_psp',
        'xref',
        'refund_id',
        'partial_refund',
        'callback_send',
        'callback_receive',
        'success_reported',
        '3ds_started',
        'bank_status',
        'ip_address',
        'status_history',
        'auth_code',
        'akur_status',
        'gatewayID',
        'extra_gatewayID',
        'chargeID',
        'akuratecoDate',
        'StripeDate',
        'settlement_date',
        'settlement_number',
        'psp_updated',
        'updated_at',
        'created_at'
    ];

    protected $guarded = [];

    protected $table = 'transactions';
}
