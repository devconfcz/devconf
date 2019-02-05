FROM fedora
RUN dnf install -y python3 python3-pip npm httpd
RUN pip3 install devconf
RUN npm install -g firebase-tools
ADD ./ /opt/devconf
WORKDIR /opt/devconf
RUN cd /opt/devconf && comdev devconf build -r
RUN cp -r /opt/devconf/build/* /var/www/html/
EXPOSE 80
