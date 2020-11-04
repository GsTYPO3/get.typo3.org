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

namespace App\Form\Dto;

use App\Enum\BasePackageEnum;
use App\Enum\Typo3VersionEnum;
use Symfony\Component\Validator\Constraints as Assert;
use T3O\GetApi\Entity\Sitepackage;

class SitepackageDto
{
    /**
     * @Assert\NotBlank()
     * @Assert\Choice(callback={"T3O\GetApi\Enum\Typo3VersionEnum", "getAvailableOptions"})
     *
     * @SWG\Property(type="int", example="10004000")
     */
    public int $typo3Version = Typo3VersionEnum::OPTION_10_4;

    /**
     * @Assert\NotBlank()
     * @Assert\Choice(callback={"T3O\GetApi\Enum\BasePackageEnum", "getAvailableOptions"})
     *
     * @SWG\Property(type="string", example="bootstrap_package")
     */
    public string $basePackage = BasePackageEnum::OPTION_BOOTSTRAP_PACKAGE;

    /**
     * @Assert\Length(
     *     allowEmptyString=true,
     *     min=3
     * )
     * @Assert\Regex(
     *     pattern="/^[A-Z][A-Za-z0-9]+$/",
     *     message="Only letters, numbers and spaces are allowed"
     * )
     * @SWG\Property(type="string", example="BK2K", default="generated from author->company if empty")
     * @Serializer\Type("string")
     * @var string
     */
    public $vendorName = '';

    /**
     * @Assert\Length(
     *     allowEmptyString=true,
     *     min=3
     * )
     * @Assert\Regex(
     *     pattern="/^[a-z][a-z0-9-]+$/",
     *     message="Only letters, numbers and hyphens are allowed"
     * )
     * @SWG\Property(type="string", example="bk2k", default="generated from vendor name if empty")
     * @Serializer\Type("string")
     * @var string
     */
    public $vendorNameAlternative = '';

    /**
     * @Assert\NotBlank(
     *     message="Please enter a title for your site package"
     * )
     * @Assert\Length(
     *     min=3
     * )
     * @Assert\Regex(
     *     pattern="/^[A-Za-z0-9\x7f-\xff .:&-]+$/",
     *     message="Only letters, numbers and spaces are allowed"
     * )
     *
     * @SWG\Property(type="string", example="My Sitepackage")
     * @Serializer\Type("string")
     * @var string
     */
    public $title;

    /**
     * @Assert\Regex(
     *     pattern="/^[A-Za-z0-9\x7f-\xff .,:!?&-]+$/",
     *     message="Only letters, numbers and spaces are allowed"
     * )
     *
     * @SWG\Property(type="string", example="Project Configuration for Client")
     * @Serializer\Type("string")
     * @var string
     */
    public $description;

    /**
     * @Assert\Length(
     *     allowEmptyString=true,
     *     min=3
     * )
     * @Assert\Regex(
     *     pattern="/^[A-Z][A-Za-z0-9]+$/",
     *     message="Only letters and numbers are allowed"
     * )
     * @SWG\Property(type="string", example="MySitepackage", default="generated from title if empty")
     * @Serializer\Type("string")
     * @var string
     */
    public $packageName = '';

    /**
     * @Assert\Length(
     *     allowEmptyString=true,
     *     min=3
     * )
     * @Assert\Regex(
     *     pattern="/^[a-z][a-z0-9-]+$/",
     *     message="Only lower case letters, numbers and hyphens are allowed"
     * )
     * @SWG\Property(type="string", example="my-sitepackage", default="generated from package name if empty")
     * @Serializer\Type("string")
     * @var string
     */
    public $packageNameAlternative = '';

    /**
     * @Assert\Length(
     *     allowEmptyString=true,
     *     min=3
     * )
     * @Assert\Regex(
     *     pattern="/^[a-z][a-z0-9_]+$/",
     *     message="Only lower case letters, numbers and undscores are allowed"
     * )
     * @SWG\Property(type="string", example="my_sitepackage", default="generated from package name if empty")
     * @Serializer\Type("string")
     * @var string
     */
    public $extensionKey = '';

    /**
     * @Assert\Url
     * @SWG\Property(type="string", example="https://github.com/benjaminkott/packagebuilder")
     *
     * @Serializer\Type("string")
     * @var string
     */
    public $repositoryUrl = '';

    /**
     * @Assert\Valid
     * @Serializer\Type(Author::class)
     * @var Author
     */
    public $author;

    public static function fromEntity(Sitepackage $entity): self
    {
        $dto = new self();
        $dto->uuid = $entity->getUuid();
        $dto->type = $entity->getType();
        $dto->version = $entity->getVersion();
        $dto->username = $entity->getUser()['username'];
        $dto->examTestResult = $entity->getExamTestResult();
        $dto->examLocation = $entity->getExamLocation();
        $dto->examDate = $entity->getExamDate();
        $dto->validUntil = $entity->getValidUntil();
        $dto->certificatePrintDate = $entity->getCertificatePrintDate();
        $dto->address = $entity->getAddress();
        $dto->proctoringApproval = $entity->getProctoringApproval();

        return $dto;
    }
}
