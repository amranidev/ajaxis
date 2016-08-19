<?php

namespace Amranidev\Ajaxis;

use Amranidev\Ajaxis\Autoarray\AutoArray;
use Amranidev\Ajaxis\Bootstrap\Builders\BootstrapDeleteConfirmationMessage;
use Amranidev\Ajaxis\Bootstrap\Builders\BootstrapDisplayBuilder;
use Amranidev\Ajaxis\Bootstrap\Builders\BootstrapModalBuilder;
use Amranidev\Ajaxis\Bootstrap\Builders\BootstrapText;
use Amranidev\Ajaxis\Materialize\Builders\MaterializeDeleteConfirmationMessage;
use Amranidev\Ajaxis\Materialize\Builders\MaterializeDisplayBuilder;
use Amranidev\Ajaxis\Materialize\Builders\MaterializeModalBuilder;
use Amranidev\Ajaxis\Modal\ModalDirector;
use Illuminate\Database\Eloquent\Model;

/**
 * class AjaxisGenerate.
 *
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class AjaxisGenerate
{
    /**
     * ModalDirector instance.
     *
     * @var
     */
    private $modalDirector;

    /**
     * Materialize Modal Content.
     *
     * @var MtModal
     */
    private $MtModal;

    /**
     * Bootstrap Modal Content.
     *
     * @var;
     */
    private $BtModal;

    /**
     * create new AjaxisGenerate instrance.
     */
    public function __construct()
    {
        $this->modalDirector = new ModalDirector();

        $this->MtModal = new MaterializeModalBuilder();

        $this->BtModal = new BootstrapModalBuilder();
    }

    /**
     * Show Ajaxis materialize form to edit specified resource.
     *
     * @param array  $input
     * @param string $link
     *
     * @return string
     */
    public function mtEditFormModal($input, $link, $title)
    {
        $modal = $this->modalDirector->build($title, 'update', $input, $link, $this->MtModal);

        return $modal->modalHead.$modal->modalBody.$modal->modalFooter;
    }

    /**
     * Show Ajaxis materialize form to create specified resource.
     *
     * @param srray  $input
     * @param string $link
     *
     * @return string
     */
    public function mtCreateFormModal($input, $link, $title)
    {
        $modal = $this->modalDirector->build($title, 'create', $input, $link, $this->MtModal);

        return $modal->modalHead.$modal->modalBody.$modal->modalFooter;
    }

    /**
     * Show materialize confirmation message to delete  specified resource.
     *
     * @param string $title
     * @param string $message
     * @param string $link
     *
     * @return string
     */
    public function mtDeleting($title, $message, $link)
    {
        $modal = new MaterializeDeleteConfirmationMessage();

        $modal = $this->modalDirector->build($title, 'Delete', $message, $link, $modal);

        return $modal->modalHead.$modal->modalBody.$modal->modalFooter;
    }

    /**
     * Show materialize modal to displa specified resource.
     *
     * @param array $input
     *
     * @return string
     */
    public function mtDisplay($input)
    {
        $modal = new MaterializeDisplayBuilder();

        $modal = $this->modalDirector->build(null, null, $input, null, $modal);

        return $modal->modalHead.$modal->modalBody.$modal->modalFooter;
    }

    /**
     * Show bootsrap modal to delete specified resource.
     *
     * @param string $title
     * @param string $body
     * @param string $link
     *
     * @return string
     */
    public function btDeleting($title, $body, $link)
    {
        $modal = new BootstrapDeleteConfirmationMessage();

        $modal = $this->modalDirector->build($title, 'Agree', $body, $link, $modal);

        return $modal->modalHead.$modal->modalBody.$modal->modalFooter;
    }

    /**
     * Show Ajaxis bootstrap form to create specified resource.
     *
     * @param array  $input
     * @param string $link
     *
     * @return string
     */
    public function btCreateFormModal($input, $link, $title)
    {
        $modal = $this->modalDirector->build($title, 'Create', $input, $link, $this->BtModal);

        return $modal->modalHead.$modal->modalBody.$modal->modalFooter;
    }

    /**
     * Show Ajaxis bootstrap form to edite specified resource.
     *
     * @param array  $input
     * @param string $link
     *
     * @return string
     */
    public function btEditFormModal($input, $link, $title)
    {
        $modal = $this->modalDirector->build($title, 'update', $input, $link, $this->BtModal);

        return $modal->modalHead.$modal->modalBody.$modal->modalFooter;
    }

    /**
     * Show bootstrap modal to display specified resource.
     *
     * @param array $input
     *
     * @return string
     */
    public function btDisplay($input)
    {
        $modal = new BootstrapDisplayBuilder();

        $modal = $this->modalDirector->build('Dsiplay', 'ok', $input, null, $modal);

        return $modal->modalHead.$modal->modalBody.$modal->modalFooter;
    }

    /**
     * build Materialize modal quickly by a table name.
     *
     * @param string $table
     * @param string $link
     *
     * @return string
     */
    public function mtGet($table, $link, $title)
    {
        $result = new AutoArray($table);

        $modal = $this->modalDirector->build($title, 'Create', $result->merge(), $link, $this->MtModal);

        return $modal->modalHead.$modal->modalBody.$modal->modalFooter;
    }

    /**
     * build modal quickly by Eloquent model.
     *
     * @var model
     * @var string $link
     *
     *  @return string
     */
    public function mtEditText(Model $model, $link, $title)
    {
        $result = new AutoArray('');

        $modal = $this->modalDirector->build($title, 'Update', $result->getModelArray($model), $link, $this->MtModal);

        return $modal->modalHead.$modal->modalBody.$modal->modalFooter;
    }

    /**
     * build Bootstrap modal quickly by a table name.
     *
     * @param string $table
     * @param string $link
     *
     * @return string
     */
    public function btGet($table, $link, $title)
    {
        $result = new AutoArray($table);

        $modal = $this->modalDirector->build($title, 'Create', $result->merge(), $link, $this->BtModal);

        return $modal->modalHead.$modal->modalBody.$modal->modalFooter;
    }

    /**
     * build modal quickly by Eloquent model.
     *
     * @param Illuminate\Database\Eloquent\Model $model
     * @param string                             $link
     *
     * @return string
     */
    public function btEditText(Model $model, $link, $title)
    {
        $result = new AutoArray('');

        $modal = $this->modalDirector->build($title, 'Update', $result->getModelArray($model), $link, $this->BtModal);

        return $modal->modalHead.$modal->modalBody.$modal->modalFooter;
    }

        /**
         * build simple modal with text.
         *
         * @param string $input
         * @param string $link
         *
         * @return string
         */
        public function btText($input, $link)
        {
            $director = new ModalDirector();

            $modal = new BootstrapText();

            $modal = $director->build('Has Role', 'Ok', $input, $link, $modal);

            return $modal->modalHead.$modal->modalBody.$modal->modalFooter;
        }
}
