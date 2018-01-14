<?php

class Category extends Eloquent {

// Permet de ne pas avoir les colonnes create_at & update_at dans nos tables correspondantes aux modèles
    public $timestamps = false;
}