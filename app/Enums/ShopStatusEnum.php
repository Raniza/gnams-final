<?php

namespace App\Enums;

enum ShopStatusEnum:string 
{
    case Submitted = 'submitted';
    case Rejected = 'rejected';
    case Approved = 'approved';
}