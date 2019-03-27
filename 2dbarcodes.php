<?php

/**
 * PHP class to creates array representations for 2D barcodes to be used with TCPDF.
 *
 * @abstract Functions for generating string representation of 2D barcodes.
 *
 * @copyright 2008-2009 Nicola Asuni - Tecnick.com S.r.l (www.tecnick.com) Via Della Pace, 11 - 09044 - Quartucciu (CA) - ITALY - www.tecnick.com - info@tecnick.com
 *
 * @link http://www.tcpdf.org
 *
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 *
 * @version 1.0.001
 */
class TCPDF2DBarcode
{

    /**
     * @var array representation of barcode.
     * @access protected
     */
    protected $barcode_array;

    /**
     * This is the class constructor.
     * Return an array representations for 2D barcodes:<ul>
     * <li>$arrcode['code'] code to be printed on text label</li>
     * <li>$arrcode['num_rows'] required number of rows</li>
     * <li>$arrcode['num_cols'] required number of columns</li>
     * <li>$arrcode['bcode'][$r][$c] value of the cell is $r row and $c column (0 = transparent, 1 = black)</li></ul>
     *
     * @param string $code code to print
     * @param string $type type of barcode: <ul><li>TEST</li><li>...TO BE IMPLEMENTED</li></ul>
     */
    public function __construct($code, $type)
    {
        $this->setBarcode($code, $type);
    }

    /**
     * Return an array representations of barcode.
     *
     * @return array
     */
    public function getBarcodeArray()
    {
        return $this->barcode_array;
    }

    /**
     * Set the barcode.
     *
     * @param string $code code to print
     * @param string $type type of barcode: <ul><li>TEST</li><li>...TO BE IMPLEMENTED</li></ul>
     *
     * @return array
     */
    public function setBarcode($code, $type)
    {
        $mode = explode(',', $type);
        switch (strtoupper($mode[0])) {
            case 'TEST': { // TEST MODE
                $this->barcode_array['num_rows'] = 5;
                $this->barcode_array['num_cols'] = 15;
                $this->barcode_array['bcode'] = [
                    [1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1],
                    [0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0],
                    [0, 1, 0, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 0],
                    [0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0],
                    [0, 1, 0, 0, 1, 1, 1, 0, 1, 1, 1, 0, 0, 1, 0]
                ];
                break;
            }
            default: {
                $this->barcode_array = false;
            }
        }
    }
} // end of class

//============================================================+
// END OF FILE
//============================================================+
