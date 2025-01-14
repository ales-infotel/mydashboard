<?php
/*
 -------------------------------------------------------------------------
 MyDashboard plugin for GLPI
 Copyright (C) 2015 by the MyDashboard Development Team.
 -------------------------------------------------------------------------

 LICENSE

 This file is part of MyDashboard.

 MyDashboard is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 MyDashboard is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with MyDashboard. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */

include('../../../inc/includes.php');

Session::checkLoginUser();

//Save user preferences
if (isset ($_POST['update'])) {
   $pref = new PluginMydashboardPreference();
   $pref->check(-1, UPDATE, $_POST);
   if(isset($_POST["prefered_group"])){
      $_POST["prefered_group"] = json_encode($_POST["prefered_group"]);
   }else{
      $_POST["prefered_group"] = "[]";
   }
   $pref->update($_POST);
   Html::back();
}