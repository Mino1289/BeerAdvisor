<?php
    class Beer {
        public $ID_beer;
        public $name;
        public $location;
        public $color;
        public float $strength;
        public $taste;
        public $brewery;


        function __construct($ID_beer, $name, $location, $color, $strength, $taste, $brewery) {
            $this->ID_beer = $ID_beer;
            $this->name = $name;
            $this->location = $location;
            $this->color = $color;
            $this->strength = $strength;
            $this->taste = $taste;
            $this->brewery = $brewery;
            
        }

        function get_ID_beer() {
            return $this->ID_beer;
        }

        function get_name() {
            return $this->name;
        }

        function display() {
            echo "<div class='beer'>";
            echo "<h2>".$this->name."</h2>";
            echo "<div class=beerinfo>";
            echo "<p>Color : ".$this->color."</p>";
            echo "<p>Taste : ".$this->taste."</p>";
            echo "<p>Strength : ".$this->strength."%</p>";
            echo "<p>Brewery : ".$this->brewery."</p>";
            echo "<p>Location : ".$this->location."</p>";
            echo "</div></div>";

            return $this->name;
        }
    }
