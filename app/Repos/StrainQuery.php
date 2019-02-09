<?php

namespace Heisen\Repos;

use Heisen\Strain as StrainModel;

class StrainQuery implements Strain {

    public function strains(){
        return StrainModel::with([
            'seed_type',
            'breeder'
        ])->get();
    }
}
