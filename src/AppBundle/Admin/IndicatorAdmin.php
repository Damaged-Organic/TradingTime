<?php
// src/AppBundle/Admin/IndicatorAdmin.php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin,
    Sonata\AdminBundle\Datagrid\ListMapper,
    Sonata\AdminBundle\Datagrid\DatagridMapper,
    Sonata\AdminBundle\Form\FormMapper;

class IndicatorAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id', 'number', [
                'label' => "ID"
            ])
            ->addIdentifier('title', 'text', [
                'label' => "Indicator title"
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        if ($indicator = $this->getSubject()) {
            $pdfGuideRequired = ($indicator->getPdfGuideName()) ? FALSE : TRUE;

            $pdfGuideHelpOption = ($indicator->getPdfGuideName()) ?: FALSE;
        } else {$pdfGuideRequired = TRUE;
            $pdfGuideHelpOption = FALSE;
        }

        $formMapper
            ->add('title', 'text', [
                'label' => 'Indicator title'
            ])
            ->add('pdfGuideFile', 'vich_file', [
                'label'         => "PDF guide file",
                'required'      => $pdfGuideRequired,
                'allow_delete'  => FALSE,
                'download_link' => TRUE,
                'help'          => $pdfGuideHelpOption
            ])
            ->add('videoLink', 'url', [
                'label'    => "Link on YouTube video",
                'required' => FALSE
            ])
        ;
    }
}
