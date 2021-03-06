<?php 

// This file contains all of the high level data manipulating functions

// Database Data //

$server = "mysql2561int.domain.com";
$username = "u1064984_turki";
$password = "ldbdin473:klaonm";
$db = "db1064984_turkiball";
$tableP = "stats_Players";																								// Player Stats Table
$tableT = "stats_Team";																								// Team Stats Table
$tableN = "News";																								// News Table
$tableS = "Season"	;																								// Season table, with schedule info
$tablePS = "PSeason";																								// Post Season table, tournament


include("functions_db.php"); 																									// Gets the database functions for php


function getnext ($row, $table)																																// Returns the number for nav of the next newest news item
{   																																									// 0 means that the given row is the newest, no next
   $total = getrows($table)
   $next = $num + 1;
   if ($next > $total)
   {
      $next = 0;
   }   

   return ($next);
}

function getmvp ($week, $season)																																// Returns the index of the mvp for the given week
{
   // Algorithm:
   // Goals that week
   // Should be (all that week only): goals, assists, Jgoals, Jstops
   
   
   $column = $week . "_" . $season . " Goals";
   $total = getrows($tableP);
   $highest = 0;
   
   $count = 0;
   while ($count < $total)                                                       // Find highest amount of goals scored
   {
      $DATA = getdb($count, $tableP);
      if ($DATA['$column'] > $highest)
      {  $highest = $DATA['$column'];
      }
      $count++;
   }
   $count = 0;
   while ($count < $total)																			// Puts all the MVPs into an array with their index first, and their goals second
   {
      $DATA = getdb($count, $tableP);
      if ($DATA['$column'] == $highest)
      {  $mvps['$count'] = "$highest";
      }
      $count++;
   }
   
   return($mvps);
}

function getrankings ($week, $season)																														// Returns an array of every team name, in order of their rank
{																																										// Calculated using data up to given week in given season
   // Algorithm (not yet programmed in...)
   // Sum of W's in season, goals for, goals against, javelin goals, javelin stops
   // There will never be a tie with that formula
   
   $column = $week . "_" . $season . " W/L";
   $total = getrows($tableT);
   
   for ($count = 0; $count < $total; $count++)												// Fill the array with index, index again, and win/loss
   {
      $rankings['$count'] = "$count, $DATA['$column']"; 
   }
   
   // I'm not gonna eff around with this without better array info, and probably some nice php functions to sort arrays, etc.
   
   return($rankings);
}

function topbox ($week, $season)																																			// Returns The League box with the top team/player of the week
{
   $mvp = getmvp($week, $season);
   $rankings = getrankings($week, $season);
   $tteam = $rankings['0'];

   $DATA = getdb($index, $tableP);
   $mvpname = $DATA['Name'];
   $mvpteam = $DATA['Team'];
   $mvpurl = $DATA['URL'];
   $mvpteamurl = $DATA['TeamURL'];
   
   $DATA = getdb($tteam, $tableT);
   $tteamname = $DATA['Name'];
   $tteamurl = $DATA['URL'];   
   
   echo "      <div class = \"box\">\n";
   echo "         Top of the Ranks Week " . $week . "<br><br>\n";
   echo "         Top Team:<br>\n";
   echo "         <a href = \"" . $tteamurl . "\">" . $tteamname . "</a><br><br>\n";
   echo "         MVP:<br>\n";   
   echo "         <a href = \"" . $mvpurl . "\">" . $mvpname . "</a><br><br>\n";
   echo "         From<br>\n";
   echo "         <a href = \"" . $mvpteamurl . "\">" . $mvpteam . "</a><br><br>\n";
   echo "      </div>\n";
}
















?>