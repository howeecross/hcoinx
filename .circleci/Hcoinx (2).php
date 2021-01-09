
/**
 * Copyright (c) 2015-present, Facebook, Inc. All rights reserved.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * Facebook.
 *
 * As with any software that integrates with the Facebook platform, your use
 * of this software is subject to the Facebook Developer Principles and
 * Policies [http://developers.facebook.com/policy/]. This copyright notice
 * shall be included in all copies or substantial portions of the software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 */

require __DIR__ . '/vendor/autoload.php';

use FacebookAds\Object\AdAccount;
use FacebookAds\Hcoinx\AdRule;
use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;

$access_token = 'EAAIQIWnddoABAPRAO7A1XNJPshXDXCZAflupKZAqcVxhYvkZAS6lsmiT1oleYp9FZC4dRQkVBBsDMbbZCPskHwIGyYnDSGB7yQw62kKc2uNK9jpy51yHZCOZB06pJmZADepXNevkt2bEtdLM7ZAvLzbWgS6QVOJvS4gEXNWyUynZCdqiXZBjWwZBRZC6cYL9ZAZCyH6Ak0ZD';
$app_secret = 'f68b6f6a9942151f02e7ba900e97a3d7';
$ad_account_id = 'act_1185087988550696';
$entity_type = 'CAMPAIGN';
$filter_field = 'reach';
$filter_value = '1';
$filter_operator = 'LESS_THAN';
$app_id = '580685649507968';

$api = Api::init($app_id, $app_secret, $access_token);
$api->setLogger(new CurlLogger());

$fields = array(
);
$params = array(
  'name' => 'Sample SDK Rule',
  'evaluation_spec' => array('evaluation_type' =>  'TRIGGER', 'trigger' =>  array( 'type' =>  'STATS_CHANGE', 'field' =>  $filter_field, 'value' =>  $filter_value, 'operator' =>  $filter_operator ), 'filters' =>  array( array( 'field' =>  'entity_type', 'value' =>  $entity_type, 'operator' =>  'EQUAL' ), array( 'field' =>  'time_preset', 'value' =>  'LIFETIME', 'operator' =>  'EQUAL' ) )),
  'execution_spec' => array( 'execution_type' =>  'PING_ENDPOINT', ),
);
echo json_encode((new AdAccount($ad_account_id))->createAdRulesLibrary(
  $fields,
  $params
)->getResponse()->getContent(), JSON_PRETTY_PRINT);

