<?php

namespace App\Enum;

enum EtatI: string
{
    case EN_ATTENTE = 'en_attente';
    case CONFIRME = 'confirme';
    case ANNULE = 'annule';
    case REPORTE = 'reporte';
}
