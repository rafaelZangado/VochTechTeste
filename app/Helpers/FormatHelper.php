<?php

namespace App\Helpers;

class FormatHelper
{
    public static function formatCpfCnpj($value)
    {
        // Remove tudo que não for número
        $value = preg_replace('/\D/', '', $value);

        if (strlen($value) === 11) {
            return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $value);
        } elseif (strlen($value) === 14) {
            return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $value);
        }

        return $value;
    }

    public static function formatDate($date)
    {
        if (!$date) return 'N/A'; // Evita erro se a data for nula

        return \Carbon\Carbon::parse($date)->format('d/m/Y H:i');
    }
}
