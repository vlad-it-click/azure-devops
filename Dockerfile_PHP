FROM httpd:2.4
RUN apt-get -y update
RUN apt-get -y install php
#COPY ./index.html /usr/local/apache2/htdocs/
COPY ./index.php /usr/local/apache2/htdocs/
RUN /bin/bash -c 'chmod 644 /usr/local/apache2/htdocs/index.php' 
