<?php
require_once 'interfaces/Export_Interface.php';

class PDF_Export extends TCPDF implements Export_Interface
{
    protected $columns;
    protected $data;

    private $WIDTH = 195;

    public function set_columns($columns)
    {
        $this->columns = $columns;
    }

    public function set_data(&$data)
    {
        $this->data = &$data;
    }

    public function make()
    {
        $this->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

        $this->SetFont('helvetica', '', 12);
        $this->AddPage();

        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');

        $this->Ln(6);

        $width = $this->WIDTH / count($this->columns);

        // header table
        foreach ($this->columns as $column) {
            $this->Cell($width, 7, $column, 1, 0, 'C', 1);
        }

        $this->Ln();

        foreach($this->data as $value) {
            foreach($value as $key => $item) {
                if(in_array($key, $this->columns)) {
                    $this->Cell($width, 7, $item, 1, 0, 'C', 1);
                }
            }

            $this->Ln();
        }


        $this->Output('example_003.pdf', 'I');
    }

    public function Header()
    {
        $image_file = K_PATH_IMAGES . 'logo_example.jpg';

        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        $this->SetFont('helvetica', 'B', 20);

        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    public function Footer()
    {
        $this->SetY(-15);

        $this->SetFont('helvetica', 'I', 8);

        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
