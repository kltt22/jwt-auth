<?php


namespace Yuan\JwtAuth;

use Yuan\JwtAuth\claim\Factory;
use Yuan\JwtAuth\claim\Issuer;
use Yuan\JwtAuth\claim\Audience;
use Yuan\JwtAuth\claim\Expiration;
use Yuan\JwtAuth\claim\IssuedAt;
use Yuan\JwtAuth\claim\JwtId;
use Yuan\JwtAuth\claim\NotBefore;
use Yuan\JwtAuth\claim\Subject;

class Payload
{
    protected $factory;

    protected $classMap
        = [
            'aud' => Audience::class,
            'exp' => Expiration::class,
            'iat' => IssuedAt::class,
            'iss' => Issuer::class,
            'jti' => JwtId::class,
            'nbf' => NotBefore::class,
            'sub' => Subject::class,
        ];

    protected $claims;

    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    public function customer(array $claim = [])
    {
        foreach ($claim as $key => $value) {
            $this->factory->customer(
                $key,
                is_object($claim) && method_exists($claim, 'getValue') ? $value->getValue() : $value
            );
        }

        return $this;
    }

    public function get()
    {
        $claim = $this->factory->builder()->getClaims();

        return $claim;
    }

    public function check($refresh = false)
    {
        $this->factory->validate($refresh);

        return $this;
    }
}
