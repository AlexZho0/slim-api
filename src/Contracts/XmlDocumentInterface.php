<?php

namespace App\Contracts;

/**
 * Can be used to convert custom data into a xml document
 */
interface XmlDocumentInterface
{
    public function setVersion(string|float $version): void;
    public function setStatus(string|int $status): void;
    public function setBody(array $data): void;
    public function render(): string;
}