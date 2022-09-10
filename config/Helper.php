<?php
class Helper
{
    public static function Currency($value)
    {
        return number_format($value, 0, ',', '.') . ' ₫';
    }

    public static function Phone($str)
    {
        if (strlen($str) == 11) {
            return substr($str, 0, 5) . ' ' . substr($str, 5, 3) . ' ' . substr($str, 8, 3);
        } else if (strlen($str) == 10) {
            return substr($str, 0, 4) . ' ' . substr($str, 4, 3) . ' ' . substr($str, 7, 3);
        }
        return '';
    }

    public static function Date($str)
    {
        return date('d/m/Y', strtotime($str));
    }

    public static function DateTime($str)
    {
        return date('d/m/Y H:i:s', strtotime($str));
    }

    public static function StatusBadge($value)
    {
        return $value == 1 ? "<span class='badge badge-success'>Hoạt động</span>" : "<span class='badge badge-danger'>Khóa</span>";
    }

    public static function PaymentBadge($value)
    {
        return $value == 1 ? "<span class='badge badge-success'>Đã thanh toán</span>" : "<span class='badge badge-warning'>Chưa thanh toán</span>";
    }

    public static function AccountTypeBadge($value)
    {
        if ($value == 1) {
            return "<span class='badge badge-success'>Quản trị viên</span>";
        } else if ($value == 2) {
            return "<span class='badge badge-info'>Nhân viên</span>";
        } else {
            return "<span class='badge badge-dark'>Thành viên</span>";
        }
    }
}
