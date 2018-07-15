<?php
class Glosar {
    protected $glosar = [];

    public function __construct() {
        $fh = fopen("glosar.txt", "r");
        while (!feof($fh)) {
            $definitie = preg_split("/\t/", fgets($fh));
            $this->insereaza($definitie);
        }
        fclose($fh);
    }

    public function insereaza($definitie)
    {
        if (is_array($definitie) && count($definitie) > 1) {
            $termen = $definitie[0];
            $date = ['traducere' => $definitie[1], 'observatii' => $definitie[2]];

            if (array_key_exists($termen, $this->glosar)) {
                $this->glosar[$termen]['alternative'][] = $date;
            } else {
                $this->glosar[$termen] = $date;
            }
        }
    }

    public function getJSObject()
    {
        return 'let glosar = ' . json_encode($this->glosar, JSON_PRETTY_PRINT) . ';';
    }
}
