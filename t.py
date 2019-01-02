import requests

def main():
	url = 'http://localhost:8080/loadsubjects.php'
	payload = {
		'command':'#searchkeyword',
		'keywordd':'w'
	}
	rps = requests.post(url = url, data = payload)
	print(rps.text)
	return


if __name__ == '__main__':
	main()