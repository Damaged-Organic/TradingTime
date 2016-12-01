<?php
// src/AppBundle/Admin/BookAdmin.php
namespace AppBundle\Admin;

use Symfony\Component\Validator\Constraints as Assert;

use Sonata\AdminBundle\Admin\Admin,
    Sonata\AdminBundle\Datagrid\ListMapper,
    Sonata\AdminBundle\Datagrid\DatagridMapper,
    Sonata\AdminBundle\Form\FormMapper;

class BookAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id', 'number', [
                'label' => "ID"
            ])
            ->addIdentifier('title', 'text', [
                'label' => "Book title"
            ])
            ->add('year', 'number', [
                'label' => "Publication year"
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        if ($book = $this->getSubject()) {
            $imageRequired   = ( $book->getCoverName() ) ? FALSE : TRUE;
            $imageHelpOption = ( $imagePath = $book->getCoverPath() )
                ? '<img src="' . $imagePath . '" class="admin-preview" />'
                : FALSE;

            $pdfPreviewRequired   = ( $book->getPdfPreviewName() ) ? FALSE : TRUE;
            $pdfPreviewHelpOption = ( $book->getPdfPreviewName() ) ?: FALSE;

            $paymentIdReadOnly = ( $book->getPaymentId() ) ? TRUE : FALSE;
        } else {
            $imageRequired   = TRUE;
            $imageHelpOption = FALSE;

            $pdfPreviewRequired   = TRUE;
            $pdfPreviewHelpOption = FALSE;

            $paymentIdReadOnly = FALSE;
        }

        $formMapper
            ->add('paymentId', 'text', [
                'label'     => 'PayPal item ID',
                'read_only' => $paymentIdReadOnly
            ])
            ->add('title', 'text', [
                'label' => 'Book title'
            ])
            ->add('year', 'number', [
                'label' => "Publication year"
            ])
            ->add('coverFile', 'vich_file', [
                'label'         => "Book Cover",
                'required'      => $imageRequired,
                'allow_delete'  => FALSE,
                'download_link' => FALSE,
                'help'          => $imageHelpOption
            ])
            ->add('description', 'sonata_formatter_type', [
                'label'                => "Description",
                'event_dispatcher'     => $formMapper->getFormBuilder()->getEventDispatcher(),
                'format_field'         => 'contentFormatter',
                'source_field'         => 'rawContent',
                'ckeditor_context'     => 'base_config',
                'source_field_options' => [
                    'attr' => [
                        'class' => 'span10', 'rows' => 10
                    ]
                ],
                'listener'             => TRUE,
                'target_field'         => 'description'
            ])
            ->add('pdfPreviewFile', 'vich_file', [
                'label'         => "PDF preview",
                'required'      => $pdfPreviewRequired,
                'allow_delete'  => FALSE,
                'download_link' => TRUE,
                'help'          => $pdfPreviewHelpOption
            ])
            ->add('awardYear', 'number', [
                'label'    => "Award year",
                'required' => FALSE
            ])
            ->add('awardTitle', 'text', [
                'label'    => "Award title",
                'required' => FALSE
            ])
            ->end()
            ->with('Pricing')
                ->add('code', 'text', [
                    'label' => "Currency code"
                ])
                ->add('sign', 'text', [
                    'label' => "Currency sign"
                ])
                ->add('price', 'number', [
                    'label'       => "Price",
                    'precision'   => 2,
                    'constraints' => [
                        new Assert\Range(['min' => 0])
                    ]
                ])
            ->end()
        ;
    }
}