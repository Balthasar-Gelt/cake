<?php
namespace spec\App\Search;

use App\Search\Parser;
use PhpSpec\ObjectBehavior;

class ParserSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Parser::class);
    }

    public function it_should_have_default_regex_set()
    {
        $this->getRegEx()->shouldBeEqualTo('/^[0-9]+\s*x\s*[0-9]+$/');
    }

    public function it_should_allow_to_set_regex()
    {
        $this->setRegEx('/^[0-9]+\s*y\s*[0-9]+$/');

        $this->getRegEx()->shouldReturn('/^[0-9]+\s*y\s*[0-9]+$/');
    }

    public function it_should_parse()
    {
        $this->parse('123 x 123')->shouldReturn(1);
        $this->parse('asd x 123')->shouldReturn(0);
    }
}
