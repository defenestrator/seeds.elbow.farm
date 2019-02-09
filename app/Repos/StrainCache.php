<?php

namespace Heisen\Repos;

use Cache;

class StrainCache implements Strain {

    protected $next;

    public function __construct (Strain $next) {
            $this->next = $next;
    }

    public function strains() {
        return Cache::remember('strains', 60, function() {
                return $this->next->strains();
        });
    }
}
