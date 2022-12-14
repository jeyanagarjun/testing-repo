<?php
/**
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.0.0
 *  @since     1.0.0
 */
          $start_date              = rekord_get_field( "start_date" ); 
          $end_date                = rekord_get_field( "end_date" ); 
          $time                    = rekord_get_field( "time" ); 
          $location                = rekord_get_field( "location" ); 

         $date   = explode(" ", $start_date);
         $day    =  str_replace("," , "" , $date[1]);
         $month  = $date[0]; 