<?php

declare(strict_types=1);

/*
 * This file is part of the package t3o/gettypo3org.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace App\Factory;

use App\Form\Dto\SitepackageDto;
use T3O\GetApi\Entity\Sitepackage;

class SitepackageFactory
{
    public static function fromDto(SitepackageDto $dto, Sitepackage $entity = null): Certification
    {
        $certification = $entity ?? new Sitepackage();
        $certification
            ->setType($dto->type)
            ->setVersion($dto->version)
            ->setAddress($dto->address)
            ->setExamTestResult($dto->examTestResult)
            ->setExamLocation($dto->examLocation)
            ->setExamDate($dto->examDate)
            ->setValidUntil($dto->validUntil)
            ->setCertificatePrintDate($dto->certificatePrintDate)
            ->setProctoringApproval($dto->proctoringApproval)
        ;

        return $certification;
    }

    public static function fromEntity(Sitepackage $certification): SitepackageDto
    {
        $dto = CertificationDto::fromEntity($certification);

        return $dto;
    }
}
