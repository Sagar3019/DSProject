try :
	import pandas as pd
	class Loader:
		def csvloader(path):
			df=pd.read_csv(path,parse_dates=True)
			return df
		def exloader(path):
			df=pd.read_excel(path,parse_dates=True)
			return df
		def dbloader(tname,conn):
			df=pd.read_sql(tname,conn,parse_dates=True)
			return df
except ImportError:
	print("Error Loading pandas Module !")