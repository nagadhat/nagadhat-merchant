<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    use HasFactory;
    protected $table = "vendors";
    protected $fillable = [
        "email",
        "phone",
        "username",
        "password",
        "contact_number_1",
        "contact_number_2",
        "contact_email_1",
        "contact_email_2",
        "vendor_unique_code",
        "vendor_support_pin",
        "shop_name",
        "owner_name",
        "status",
        "holiday_mode",
        "holiday_start_date",
        "holiday_end_date",
        "responsible_person_email",
        "responsible_person_phone",
        "responsible_person_full_name",
        "responsible_person_address",
        "responsible_person_nid",
        "responsible_person_nid_front",
        "responsible_person_nid_back",
        "nominee_name",
        "nominee_address",
        "nominee_contact_number",
        "nominee_email",
        "nominee_nid",
        "shop_type",
        "business_product_type",
        "location",
        "business_reg_number",
        "business_tin",
        "business_document",
        "business_visiting_card",
        "bank_check",
        "trade_license",
        "trade_license_file",
        "warehouse_address_1",
        "warehouse_address_2",
        "warehouse_address_3",
        "warehouse_address_4",
        "warehouse_address_5",
        "head_office_address",
        "return_address_1",
        "return_address_2",
        "logo",
        "banner",
        "rating",
        "aggrement_paper",
        "delivery_option",
        "slug",
        "payment_bkash",
        "payment_rocket",
        "payment_upay",
        "payment_rocket",
        "payment_upay",
        "bank_account_number",
        "bank_account_name",
        "bank_account_branch",
        "bank_account_routing",
        "u_id"
    ];
    public $timestamps = false;
    // function to create relationship with the vendor and address table
    public function vendorAddress()
    {
        return $this->belongsTo(address_assign::class, 'address_id', 'id');
    }

    // function to create relationship with the users and vendor table info
    public function vendorToUser()
    {
        return $this->belongsTo(User::class, 'u_id', 'id');
    }
}
