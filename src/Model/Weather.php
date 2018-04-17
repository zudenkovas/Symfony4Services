<?php

namespace App\Model;

class Weather
{
    public const SUNNY = 1;
    public const CLOUDY = 2;
    public const RAINING = 3;
    /**
     * @var integer
     */
    protected $dayTemp;
    /**
     * @var integer
     */
    protected $nightTemp;
    /**
     * @var int
     */
    protected $sky;

    /**
     * @var \DateTime
     */
    protected $date;

    /** @var string */
    protected $provider;

    /**
     * @return int
     */
    public function getDayTemp(): int
    {
        return $this->dayTemp;
    }

    /**
     * @param int $dayTemp
     */
    public function setDayTemp(int $dayTemp): void
    {
        $this->dayTemp = $dayTemp;
    }

    /**
     * @return int
     */
    public function getNightTemp(): int
    {
        return $this->nightTemp;
    }

    /**
     * @param int $nightTemp
     */
    public function setNightTemp(int $nightTemp): void
    {
        $this->nightTemp = $nightTemp;
    }

    /**
     * @return int
     */
    public function getSky(): int
    {
        return $this->sky;
    }

    /**
     * @param int $sky
     */
    public function setSky(int $sky): void
    {
        $this->sky = $sky;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     */
    public function setProvider($provider): void
    {
        $this->provider = $provider;
    }
}
