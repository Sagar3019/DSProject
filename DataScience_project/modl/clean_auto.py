class Cleaner:
	def dfcl(df,ch):
		try :
			import numpy as np
			if ch==1 or ch==2:
				missing_values = ["n/a","Na","na","--",""," "]
				df=df.replace(missing_values,np.nan)
				df=df.interpolate(method='nearest',axis=0)
				return df
			elif ch==3:
				df=df.replace(['', 'null'],np.nan)
				df=df.interpolate(method='nearest',axis=0)
				return df
		except ImportError:
			print("Error Loading Numpy Module !")