FROM httpd:2.4
RUN apt-get -y update
RUN apt-get -y install php vim
COPY ./cgi.conf /usr/local/apache2/conf/extra/
COPY ./index.sh /usr/local/apache2/cgi-bin/
RUN /bin/bash -c 'chmod 755 /usr/local/apache2/cgi-bin/index.sh' 
