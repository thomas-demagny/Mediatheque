<?php 

use PHPUnit\Framework\TestCase;

class PenalitesTest extends TestCase{
    private $p;

    public static function setUpBeforeClass(){}
    public static function tearDownAfterClass(){}
    
    public function levelProvider(){
        $schema = ['Bénin' => [1,0], 'Moyen' => [5,2], 'Critique' => [21,5]];
        return $schema;
    }

    public function dataProvider(){
        $schema = ["Cas n°1" => [new \DateTime(), new \DateTime(), 0]];
        $schema = ["Cas n°2" => [new \DateTime('2020-05-10'), new \DateTime('2020-05-15'), 5]];
        $schema = ["Cas n°3" => [new \DateTime('2020-03-10'), new \DateTime('2020-05-15'), 65]];
        return $schema;
    }

    public function setUp(){
        $stub = $this->createMock(MemberRepository::class);
        $stub->method('find')
             ->willReturn(new Member()->setFirstName('Albert')->setLastName('Dupont'));
        
        $memberRep = self::$container->get('doctrine')->getRepository(Member::class);
        
        $this->p = new Penalitie($stub);
        
        $this->user = $this->p->rep->find(10);
        $this->user->getFirstName();

        $this->user = $memberRep->find(10);
    }

    public function tearDown(){
        $this->p = null
    }

    /**
     * @dataProvider dataProvider
     */
    public function testComputeDelay(\DateTime $d1, \DateTime $d2, int $result){
        $result = $this->p->computeDelay($d1, $d2);

        $this->assertEquals($delay, $result);
    }
}

?>