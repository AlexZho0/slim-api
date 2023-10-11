<?php

namespace App\Services;

use App\Contracts\XmlDocumentInterface;
use Spatie\ArrayToXml\ArrayToXml;

/**
 * Convert array into xml document 
 */
class XmlRender implements XmlDocumentInterface
{
    private string $root;
    private string $encoding;
    private string $version = '1.0';
    private string $status;
    private array $body;

    /**
     * @param string $root
     * @param mixed $encoding='UTF-8'
     */
    public function __construct($root = 'response', $encoding='utf-8')
    {
        $this->root = $root;
        $this->encoding = $encoding;
    }

    public function setVersion(string|float $version): void
    {
        $this->version = (string)$version;
    }

    public function setStatus(string|int $status): void
    {
        $this->status = (string)$status;
    }

    public function setBody(array $data): void
    {
        $this->body = $data;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return ArrayToXml::convert($this->getData(), $this->root, true, $this->encoding, $this->version);
    }

    protected function getData(): array
    {
        return array_merge(['status' => $this->status], $this->body);
    }
}