<?php

namespace App\Enum;

enum EtatI: string
{
    case EN_ATTENTE = 'en_attente';
    case CONFIRME = 'confirme';
    case ANNULE = 'annule';
    case REPORTE = 'reporte';

    public function getLabel(): string
    {
        return match($this) {
            self::EN_ATTENTE => 'En attente',
            self::CONFIRME => 'Confirmé',
            self::ANNULE => 'Annulé',
            self::REPORTE => 'Reporté',
        };
    }
}
