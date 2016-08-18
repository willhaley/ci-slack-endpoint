# ci-slack-endpoint
CodeIgniter Slack Custom Command Endpoint Library

This CodeIgniter library allows you to quickly build out endpoints for custom slack commands.  I built this when my company decided to look at slack as an enterprise tool.

## To use this code...

Copy the contains of the respective folders to the proper places.

For each custom slack command you create, add the slack provided token and add it to the config file.  
  * The token is going to be the key that will allow your codeigniter app to know what service you want to provide.
  * For example, if you create a service called "marco" and the slack token is 'asdf1234' your config file would like like the following.
 ```
 
 $config['tokens'] = array(
  'asdf1234' => 'marco'
 );
 ```
Create a class in the Slack folder in the Library with the name "Slack_<service name>". For this example, the class would look like...
 ```
 
 class Slack_marco extends Slack_bot
 {
    public function parse_data( $text = null ){  
    	$this->response = new Slack_reponse();
        $this->response->add('polo');        
    }

 }
 
 ```


 If your service goes to get information from a single JSON based rest api, the library would provides a very basic abilty to declare url endpoint to get data.  It would look something like this...


 ```
 class Slack_marco extends Slack_bot
 {
	protected function parse_data = 'https://not-a-real-website.fake/marco'

	public function parse_data( $text = null ){  
    
    	$this->data = $this->get_data();
    
    	$this->response = new Slack_reponse();

		$this->response->add($this->data);        
    }
 }

```
Finally, you have to include your new class in the _Libraries/Slack_service.php_ file.

You now should have a /slack service endpoint on your service that loads the slack library and performs the needed functionality.  
