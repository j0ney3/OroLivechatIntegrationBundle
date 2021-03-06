<?php

namespace DemacMedia\Bundle\OroLivechatIntegrationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use DemacMedia\Bundle\OroLivechatIntegrationBundle\Provider\Transport\LivechatTransport;

class LivechatTransportType extends AbstractType
{
    const NAME = 'demacmedia_livechat_form_rest_transport_type';

    /** @var LivechatTransport */
    protected $transport;

    /**
     * @param LivechatTransport $transport
     */
    public function __construct(LivechatTransport $transport)
    {
        $this->transport = $transport;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'apiUser',
            'text',
            ['label' => 'demacmedia.livechat.livechat_transport.api_user.label', 'required' => true]
        );
        $builder->add(
            'apiKey',
            'password',
            ['label' => 'demacmedia.livechat.livechat_transport.api_key.label', 'required' => true]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(['data_class' => $this->transport->getSettingsEntityFQCN()]);
    }
}

