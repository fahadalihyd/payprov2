<?php

namespace Fahadalihyd\Payprov2\Utilities;

use Illuminate\Contracts\Config\Repository;

class Config
{
    /**
     * @var \Illuminate\Contracts\Config\Repository
     */
    private $repository;

    /**
     * Config constructor.
     *
     * @param \Illuminate\Contracts\Config\Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Check if config uses wild card search.
     *
     * @return bool
     */
    public function clientId()
    {
        return $this->repository->get('payprov2.clientId');
    }

    /**
     * Check if config uses wild card search.
     *
     * @return bool
     */
    public function clientSecretId()
    {
        return $this->repository->get('payprov2.clientSecretId');
    }

}
