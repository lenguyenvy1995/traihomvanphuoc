<?php

namespace Botble\Obituary\Forms;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\EditorField;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Obituary\Http\Requests\ObituaryRequest;
use Botble\Obituary\Models\Obituary;
use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;

class ObituaryForm extends FormAbstract
{
    public function setup(): void
    {
        $this
            ->model(Obituary::class)
            ->setValidatorClass(ObituaryRequest::class)
            ->add('name', TextField::class, NameFieldOption::make()->required())
            // ->add('condolence_message', TextareaField::class, ['label' => 'Condolence Message'])
            ->add('avatar', MediaImageField::class, [
                'label' => 'Avatar (Profile Photo)',
            ])
            //   ->add('funeral_host', TextField::class, [
            //     'label' => 'Funeral Host (Family Representative)',
            //     'attr' => [
            //         'placeholder' => 'Enter the name of the funeral host',
            //     ],
            // ])
            ->add('account_holder', TextField::class, [
                'label' => 'Tên chủ tài khoản',
                'attr' => [
                    'placeholder' => 'Nhập Tên chủ tài khoản',
                ],
            ])
            ->add('bank_name', TextField::class, [
                'label' => 'Tên Ngân Hàng',
                'attr' => [
                    'placeholder' => 'Nhập Tên Ngân Hàng',
                ],
            ])
            ->add('account_number', TextField::class, [
                'label' => 'Số tài khoản ',
                'attr' => [
                    'placeholder' => 'Nhập Số tài khoản',
                ],
            ])     ->add('place', TextField::class, [
                'label' => 'Số Điện Thoại ',
                'attr' => [
                    'placeholder' => 'Nhập Số Điện Thoại',
                ],
            ])
         
            ->add('wreath', TextField::class, [
                'label' => 'Link Vòng Hoa',
                'attr' => [
                    'placeholder' => 'Nhập Link Vòng Hoa',
                ],
            ])
            // ->add('funeral_host', TextField::class, [
            //     'label' => 'Funeral Host (Family Representative)',
            //     'attr' => [
            //         'placeholder' => 'Enter the name of the funeral host',
            //     ],
            // ])
            // ->add(
            //     'honorific_title',
            //     SelectField::class,
            //     SelectFieldOption::make()
            //         ->label('Honorific Title')
            //         ->choices([
            //             'Ông' => 'Ông',
            //             'Bà' => 'Bà',
            //             'Cụ' => 'Cụ',
            //             'Anh' => 'Anh',
            //             'Chị' => 'Chị',
            //             'Thầy' => 'Thầy',
            //             'Cô' => 'Cô',
            //             'Khác' => 'Khác',
            //         ])
            // )
            // ->add('content', EditorField::class, [
            //     'label' => 'Obituary Content',
            //     'attr' => [
            //         'rows' => 5,
            //         'placeholder' => 'Write the main obituary announcement here...',
            //     ],
            // ])
            // ->add('funeral_program', EditorField::class, [
            //     'label' => 'Funeral Program',
            //     'attr' => [
            //         'rows' => 6,
            //         'placeholder' => 'Write the funeral schedule or program here...',
            //     ],
            // ])
            ->add('status', SelectField::class, [
                'label' => 'Status',
                'choices' => BaseStatusEnum::labels(),
            ])
            ->setBreakFieldPoint('status');
    }
}
