<?php

namespace App\Services;

use App\Contracts\Arrayable;

class CustomerEntity implements Arrayable
{
    public string $title;
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $phone;
    public string $country;

    /**
     * @param array $dataset
     */
    public function __construct(array $dataset) {
        $this->title = $dataset['name']['title'];
        $this->first_name = $dataset['name']['first'];
        $this->last_name = $dataset['name']['last'];
        $this->email = $dataset['email'];
        $this->phone = $dataset['phone'];
        $this->country = $dataset['location']['country'];
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'country' => $this->country
        ];
    }
}