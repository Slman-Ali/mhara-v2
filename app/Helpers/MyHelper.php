<?php

function randomDateInRange(DateTime $start, DateTime $end)
{
      $randomTimestamp = mt_rand($start->getTimestamp(), $end->getTimestamp());
      $randomDate = new DateTime();
      $randomDate->setTimestamp($randomTimestamp);
      return $randomDate->format('Y-m-d');
}


function getDaysMaskArray(){
      return [
            "saturday" => 1,
            "sunday" => 2,
            "moday" => 4,
            "tuesday" => 8,
            "wednesday" => 16,
            "thursday" => 32,
            "friday" => 64,
      ];
}