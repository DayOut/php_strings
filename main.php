<?php

    class Auto
    {
        protected $name;
        protected $seats;
        protected $color;
        protected $volume;
        protected $year;
        var $lic_plate;

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getSeats()
        {
            return $this->seats;
        }

        /**
         * @param mixed $seats
         */
        public function setSeats($seats)
        {
            $this->seats = $seats;
        }

        /**
         * @return mixed
         */
        public function getColor()
        {
            return $this->color;
        }

        /**
         * @param mixed $color
         */
        public function setColor($color)
        {
            $this->color = $color;
        }

        /**
         * @return mixed
         */
        public function getVolume()
        {
            return $this->volume;
        }

        /**
         * @param mixed $volume
         */
        public function setVolume($volume)
        {
            $this->volume = $volume;
        }

        /**
         * @return mixed
         */
        public function getYear()
        {
            return $this->year;
        }

        /**
         * @param mixed $year
         */
        public function setYear($year)
        {
            $this->year = $year;
        }

        /**
         * @return mixed
         */
        public function getLicPlate()
        {
            return $this->lic_plate;
        }

        /**
         * @param mixed $lic_plate
         */
        public function setLicPlate($lic_plate)
        {
            $this->lic_plate = $lic_plate;
        }

    }

    class Truck extends Auto
    {
        private $time;
        private $engine;
        private $capacity; // kg
        private $chassis;
        private $used_capacity;
        private $cars;

        /**
         * Truck constructor.
         * @param $lic_plate
         */
        function __construct($lic_plate)
        {
            $this->setLicPlate($lic_plate);
            $this->used_capacity = 0;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getTime()
        {
            return $this->time;
        }

        /**
         * @param $time
         * @return $this
         */
        public function setTime($time)
        {
            $this->time = $time;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getEngine()
        {
            return $this->engine;
        }

        /**
         * @param $engine
         * @return $this
         */
        public function setEngine($engine)
        {
            $this->engine = $engine;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getCapacity()
        {
            return $this->capacity;
        }

        /**
         * @param $capacity
         * @return $this
         */
        public function setCapacity($capacity)
        {
            $this->capacity = $capacity;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getChassis()
        {
            return $this->chassis;
        }

        /**
         * @param $chassis
         * @return $this
         */
        public function setChassis($chassis)
        {
            $this->chassis = $chassis;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getLoadedCars()
        {
            return $this->cars;
        }


        public function addCar($car)
        {
            $this->used_capacity += $car->getWeight();
            if($this->used_capacity  > $this->capacity)
            {
                return  "Автомобіль з номерним знаком ‘" . $car->getLicPlate() . "’ неможливо завантажити. Зайва вага " . ($this->used_capacity - $this->capacity) . "кг. <br>";
            }

            $cars[] = $car;
            return  "Автомобіль з номерним знаком ‘" . $car->getLicPlate() . "’ завантажено.<br>";

        }


    }

    class Car extends Auto
    {
        private $acceleration;
        private $en_copacity;
        private $body;
        private $fuel;
        private $weight;

        /**
         * Car constructor.
         * @param $name
         * @param $lic_plate
         */
        function __construct($name, $lic_plate)
        {
            $this->setName($name);
            $this->setLicPlate($lic_plate);
            return $this;
        }


        /**
         * @return mixed
         */
        public function getAcceleration()
        {
            return $this->acceleration;
        }

        /**
         * @param $acceleration
         * @return $this
         */
        public function setAcceleration($acceleration)
        {
            $this->acceleration = $acceleration;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getEnCopacity()
        {
            return $this->en_copacity;
        }

        /**
         * @param $en_copacity
         * @return $this
         */
        public function setEnCopacity($en_copacity)
        {
            $this->en_copacity = $en_copacity;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getBody()
        {
            return $this->body;
        }

        /**
         * @param $body
         * @return $this
         */
        public function setBody($body)
        {
            $this->body = $body;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getFuel()
        {
            return $this->fuel;
        }

        /**
         * @param $fuel
         * @return $this
         */
        public function setFuel($fuel)
        {
            $this->fuel = $fuel;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getWeight()
        {
            return $this->weight;
        }

        /**
         * @param $weight
         * @return $this
         */
        public function setWeight($weight)
        {
            $this->weight = $weight;
            return $this;
        }


    }

{
    $mercedes = new Truck("ВК0212АА");
    $mercedes->setCapacity(5000);

    $cars[] = (new Car("bmw", "АА0213ВС"))->setWeight(2300);
    $cars[] = (new Car("audi", "АІ0212ВС"))->setWeight(1900);
    $cars[] = (new Car("renault", "АС2333ВС"))->setWeight(2100);

    foreach ($cars as $car)
    {
        print $mercedes->addCar($car);
        // addCar() викликається в циклі і завантажує авто.
        // Автомобіль з номерним знаком ‘АС2333ВС’ неможливо завантажити. Зайва вага 1300 кг.
    }
}