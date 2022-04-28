<?php
class Helper
{
    public static function StatusBadge($value)
    {
        return $value == 1 ? "<span class='badge badge-success'>Hoạt động</span>" : "<span class='badge badge-danger'>Khóa</span>";
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
