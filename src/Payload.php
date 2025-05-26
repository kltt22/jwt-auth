<?php


namespace Yuanc\JwtAuth;

use Yuanc\JwtAuth\claim\Factory;
use Yuanc\JwtAuth\claim\Issuer;
use Yuanc\JwtAuth\claim\Audience;
use Yuanc\JwtAuth\claim\Expiration;
use Yuanc\JwtAuth\claim\IssuedAt;
use Yuanc\JwtAuth\claim\JwtId;
use Yuanc\JwtAuth\claim\NotBefore;
use Yuanc\JwtAuth\claim\Subject;

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
