pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/jovanlock/teste_deploiement.git'
            }
        }

        stage('Build PHP Image') {
            steps {
                sh 'docker build -t devops-php ./app'
            }
        }

        stage('Run MySQL') {
            steps {
                sh '''
                docker rm -f devops-db || true
                docker run -d --name devops-db \
                -e MYSQL_ROOT_PASSWORD=rootpassword \
                -e MYSQL_DATABASE=devops_demo \
                -p 3306:3306 \
                mysql:8
                '''
            }
        }

        stage('Run PHP Web App') {
            steps {
                sh '''
                docker rm -f devops-web || true
                docker run -d --name devops-web \
                --link devops-db:db \
                -p 8080:80 \
                -e DB_HOST=db \
                -e DB_USER=root \
                -e DB_PASS=rootpassword \
                -e DB_NAME=devops_demo \
                devops-php
                '''
            }
        }

        stage('Test App') {
            steps {
                sh 'curl -f http://localhost:8080 || exit 1'
            }
        }
    }
}
