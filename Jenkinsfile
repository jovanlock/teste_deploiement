pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/jovanlock/teste_deploiement.git'
            }
        }
        
        stage('Build') {
            steps {
                echo 'Building Docker images...'
                sh 'docker-compose build'
            }
        }

        stage('Test DB Connection') {
            steps {
                echo 'Testing DB connection...'
                sh 'docker-compose run --rm web php -r "include \'config.php\'; echo \'DB OK\';"'
            }
        }

        stage('Deploy') {
            steps {
                echo 'Deploying application...'
                sh 'docker-compose up -d'
            }
        }
    }

    post {
        success {
            echo '🎉 Pipeline succeeded!'
        }
        failure {
            echo '❌ Pipeline failed!'
        }
    }
}
