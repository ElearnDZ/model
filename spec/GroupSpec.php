<?php

namespace spec\Xabbuh\XApi\Model;

use PhpSpec\ObjectBehavior;
use Xabbuh\XApi\Model\Agent;
use Xabbuh\XApi\Model\InverseFunctionalIdentifier;

class GroupSpec extends ObjectBehavior
{
    function it_can_be_initialized_without_an_inverse_functional_identifier()
    {
        $this->beConstructedWith(null, 'anonymous group');
        $this->shouldBeAnInstanceOf('Xabbuh\XApi\Model\Group');
    }

    function it_is_an_actor()
    {
        $this->beConstructedWith(null, 'test');
        $this->shouldHaveType('Xabbuh\XApi\Model\Actor');
    }

    function its_properties_can_be_read()
    {
        $iri = InverseFunctionalIdentifier::withMbox('mailto:conformancetest@tincanapi.com');
        $members = array(new Agent(InverseFunctionalIdentifier::withMbox('mailto:conformancetest@tincanapi.com')));
        $this->beConstructedWith($iri, 'test', $members);

        $this->getInverseFunctionalIdentifier()->shouldReturn($iri);
        $this->getName()->shouldReturn('test');
        $this->getMembers()->shouldReturn($members);
    }
}
