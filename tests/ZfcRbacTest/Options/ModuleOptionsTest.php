<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace ZfcRbacTest;

use ZfcRbacTest\Util\ServiceManagerFactory;

/**
 * @covers \ZfcRbac\Options\ModuleOptions
 */
class ModuleOptionsTest extends \PHPUnit_Framework_TestCase
{
    public function testAssertModuleDefaultOptions()
    {
        /** @var \ZfcRbac\Options\ModuleOptions $moduleOptions */
        $moduleOptions = ServiceManagerFactory::getServiceManager()->get('ZfcRbac\Options\ModuleOptions');

        $this->assertEquals('ZfcRbac\Identity\AuthenticationIdentityProvider', $moduleOptions->getIdentityProvider());
        $this->assertTrue($moduleOptions->getCreateMissingRoles());
        $this->assertEquals('guest', $moduleOptions->getGuestRole());
        $this->assertEquals('member', $moduleOptions->getDefaultRole());
        $this->assertInstanceOf('ZfcRbac\Options\GuardsOptions', $moduleOptions->getGuards());
        $this->assertInstanceOf('ZfcRbac\Options\UnauthorizedStrategyOptions', $moduleOptions->getUnauthorizedStrategy());
        $this->assertInstanceOf('ZfcRbac\Options\RedirectStrategyOptions', $moduleOptions->getRedirectStrategy());
        $this->assertNull($moduleOptions->getCache());
    }
}
 