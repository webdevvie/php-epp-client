<?php
namespace Metaregistrar\EPP;

class metaregEppConnection extends eppConnection {
    
    public function __construct($logging = false, $settingsfile = null) {
        // Construct the EPP connection object en specify if you want logging on or off
        parent::__construct($logging, $settingsfile);
        // Specify timeout values in seconds
        // Default server configuration stuff - this varies per connected registry
        
        // Check the greeting of the server to see which of these values you need to add
        parent::addCommandResponse('Metaregistrar\EPP\eppPollRequest', 'Metaregistrar\EPP\metaregEppPollResponse');
        parent::addCommandResponse('Metaregistrar\EPP\metaregSudoRequest', 'Metaregistrar\EPP\metaregSudoResponse');
        parent::addCommandResponse('Metaregistrar\EPP\metaregInfoDomainRequest', 'Metaregistrar\EPP\eppInfoDomainResponse');
        parent::addExtension('polldata', 'http://www.metaregistrar.com/epp/polldata-1.0');
        parent::addExtension('command-ext', 'http://www.metaregistrar.com/epp/command-ext-1.0');
        parent::addExtension('ext', 'http://www.metaregistrar.com/epp/ext-1.0');
        parent::addExtension('secDNS','urn:ietf:params:xml:ns:secDNS-1.1');
        parent::addCommandResponse('Metaregistrar\\EPP\\eppDnssecUpdateDomainRequest','Metaregistrar\\EPP\\eppUpdateDomainResponse');
        //parent::enableLaunchphase('claims');
    }

}
