<?php

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

namespace Contao\MonorepoTools\Command;

use Contao\MonorepoTools\Splitter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SplitCommand extends Command
{
    private $rootDir;

    public function __construct(string $rootDir)
    {
        $this->rootDir = $rootDir;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('split')
            ->setDescription('Split monorepo into repositories by subfolder.')
            ->addOption(
                'force-push',
                null,
                null,
                'Force push branches and tags to splitted remotes. Dangerous!'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $splitter = new Splitter(
            $this->rootDir.'/.git',
            [
                'calendar-bundle' => [
                    'url' => 'git@github.com:contao/calendar-bundle.git',
                    'mapping' => [
                        '227152c888ea570e1399f8fc3c8aa10e1a940f52' => '8a7db350796008706a4652d2ea5b75ead68df78b',
                        '5164155f6756060dc55d4e93485aa41612682c1c' => 'bc260dab8fa7ea4967f539c49c0029d4e1265889',
                        '0839d01f7a0b9a11d64b7b202cdf3776478032ef' => '25744ea8c25afd0a26311a00d7654f7db2bd0c58',
                        '4a4461b3f4486cd9f9bdaacf7b6949f2d1716aa6' => 'c044c888cd47fd62d688dac3ec33f01c50dad18d',
                    ],
                ],
                'comments-bundle' => [
                    'url' => 'git@github.com:contao/comments-bundle.git',
                    'mapping' => [
                        'be6d13e259487c80bed60a259aa2711a246b3aa0' => '88d572fea3b7017e5eee31b2b03fbdf711a07c8a',
                        'b98e069139b68500b4617c240b3c46b7a3e49cb4' => '7af83e0a4b7607031d40821f976d218392ce7449',
                        'cc5e6f9e10caeceeb49fc793e3b9925d9173854e' => '29dd1f4c5d3fcb91b7c9349cfb97d9da6a9afbeb',
                        '683ca80c95fea0ee2fbf6b6b5998e97b77724091' => 'e539c80fd40b3a49283711774ece3998771e302d',
                    ],
                ],
                'core-bundle' => [
                    'url' => 'git@github.com:contao/core-bundle.git',
                    'mapping' => [
                        '6d2e3e62749b5a9b3afcf454d1b504805bb9c6e7' => '9c24eead059a7f8548d208a84ecfb17fbe7056d5',
                        '123c6d40a3212b578317d6844da48dca89080793' => '8d6437f626334f9cf59b0eb4b1afe8e1615aba43',
                        '6eb1458a692527d10fd32ed32374bc5098b568d8' => '1aed32807fa1d93958ee4bf0f0a84a81dfb40726',
                        'fed3c7b4204d66533d463c98e8fea9d59d8c1b78' => '0e6ace663e45bf4e120b164e9db1c8109d9087b7',
                    ],
                ],
                'faq-bundle' => [
                    'url' => 'git@github.com:contao/faq-bundle.git',
                    'mapping' => [
                        '1daf85faf80d8a2c2bc0e3fc1c8d92ca23b89543' => 'e950be863a494a32acf00008ee4e679064e4f819',
                        '0eefd29ab6bcc9bca902f557d6aba60f76415ba0' => 'bb96a2b51d7d700e92e6413002efd867680babfc',
                        '8120fbc973349136e0aed77b304e3bf0f5be8881' => 'de61497e7d75418dfa93a1c12eb5b413f0fbd837',
                        '38ad45e0c1243a2b67f48e69aa14de660f8f3dcb' => '1bda612914a2c246367ee7a83e73656bb0d22676',
                    ],
                ],
                'installation-bundle' => [
                    'url' => 'git@github.com:contao/installation-bundle.git',
                    'mapping' => [
                        'e3984a42db89d16cf82267edd297216d266b41aa' => 'ee040b843c06bcadc1a8cc0eed684d62a3c8f7fc',
                        '734c8772eaef1a4e451779a81c2bfef030ad52f0' => '259660c6a152de84f9dce60d3d9d4bff8f259b02',
                        '82902713c34908ed78d9b24990190932130c909a' => '88a4146e7b2792089a99a04470dce7647f48e4d8',
                        'b73ed89cccda9377838d303cb7b0833a3b1b90e9' => '28a2a56e599d52c9b803b8e1a89015714bf2b21c',
                    ],
                ],
                'listing-bundle' => [
                    'url' => 'git@github.com:contao/listing-bundle.git',
                    'mapping' => [
                        'dd9b71f58def1c3d8d1ba31c1ef09e745cdd7fa5' => '526c543adbaf54208efb905b6ff0d00ad48d1832',
                        'b9745a4457dc9ff4261f7e0f5773d2b63b49dd52' => '6e182af3ab990e186e4208ba806dd43cb3b9e530',
                        '81df735ec6aa9333baef09459f610bd3847ab946' => 'bb713b10ef98dcaf52395e2cef8f4b7f682faec5',
                        'a06d4de66922982fcadc9ee4a2b6d71a21171753' => '51c69f1089e0f39fb6bfd7fb71cf2430ef5bde01',
                    ],
                ],
                'manager-bundle' => [
                    'url' => 'git@github.com:contao/manager-bundle.git',
                    'mapping' => [
                        '70034fdb4ccc27d2468e3aa8dc658e9d38d7add9' => 'f93210d4ed936db99dec55d9caef9e21c8965c5b',
                        'fa8afff2a25c57aa46a4f66d4dcc5225f0e11143' => 'ef92ee33e28db237b34ffaf559d41bc5969f2265',
                        '9e4fdd366d3b98ba481be54c0e06f816ff7f1879' => 'dfbe7e4780bf72b6ded007e803f38b785dd7c912',
                        'd931914e27e442bc89a66aa70531348753708da7' => '4bc56a8d0960a51c7119e2eebdb08b968e582da0',
                    ],
                ],
                'news-bundle' => [
                    'url' => 'git@github.com:contao/news-bundle.git',
                    'mapping' => [
                        '2951d154c36bce159951a08706c12e6e64843f3a' => '62ab82084be21f0e29f1f37b5e4d4e0c150e225f',
                        'a1e0f71608b6f300b00310a9f3b63bb4c3a42d46' => '5e5097692fc9dfd5bbba82a7f6d64e8cb49a3c84',
                        '4a19d2d99c722db6873d702562295b26411e9946' => '9d7c1be81e79312bd532e16c3a6db89b0106153d',
                        '9b45a4310974762b59f3f76afb5b85b11dc8581c' => '851bba0e84cdc5e126ef4f72697c60534a2c8300',
                    ],
                ],
                'newsletter-bundle' => [
                    'url' => 'git@github.com:contao/newsletter-bundle.git',
                    'mapping' => [
                        'ee8856068bc687f56416f4412ea28b61b189ddf6' => 'ad1b57e5ce66857dfb16c8057b86d80e8316fa3d',
                        '22fb6437b09e08c022b507fcf0c5a9c2390fd9d9' => '89ee40d099df11e777de0d6a1d8e02d46366b406',
                        '68e318965dd839ad339936069055b2a169cbd8fe' => '7f250dcce34ebd71f0aee8311597aea7a3117e96',
                        '7086050842a5babf22fd552181874a0e72b1e4ee' => '5ad35c1360dc582289506553e55f21cd3823c621',
                    ],
                ],
            ],
            $this->rootDir.'/.monorepo-split-cache',
            $input->getOption('force-push'),
            $output
        );

        $splitter->split();
    }
}
