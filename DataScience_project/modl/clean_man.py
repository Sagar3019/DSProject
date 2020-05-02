def auto_handle(dframe):
	ob=Cleaning(dframe)
	dframe_mod=ob.main_handle()
	return dframe_mod
class Cleaning:
	'''THIS MODULE IS TO PERFORM THE DATA CLEANSING'''
	def __init__(self,df_rec):
		self.df=df_rec
	def main_handle(self):
		while True:
			self.option()
			self.check_df()
			self.ch=input("Perform more operations on DataFrame ? [Y/N] : ")
			if self.ch=='y' or self.ch=='Y':
				pass
			else:
				break
		return self.df
	def option(self):
		print("\nOperations that can be performed on the dataset :-")
		print("1. Checking if the dataset is clean or not")
		print("2. Locating NaN values")
		print("3. Getting the number of NaN values per column")
		print("4. Drop the rows with NaN values")
		print("5. Drop the columns with NaN values")
		print("6. Fill the NaN values by any specific value")
		print("7. Fill the NaN values of a particular column by a specific value")
		self.choice=int(input("Enter your choice : "))
		self.operation()
	def num_missing(self,x):
		return sum(x.isna())
	def operation(self):
		if(self.choice==1):
			if True in self.df.isna().any().values:
				print("\nDATASET IS NOT CLEAN. \n")
			else:
				print("\nDATASET IS CLEAN. \n")
		elif(self.choice==2):
			print("\nDataframe :-\n")
			print(self.df.isna())
			print("\nTrue indicates the position of NaN values. \n")
		elif(self.choice==3):
			print("\nNumber of NaN values per column :-\n")
			print(self.df.apply(self.num_missing,axis=0))
		elif(self.choice==4):
			self.df.dropna(axis=0,inplace=True)
			print("\nDataframe with rows having NaN values dropped :-\n")
			print(self.df)
		elif(self.choice==5):
			self.df.dropna(axis=1,inplace=True)
			print("\nDataframe with columns having NaN values dropped :-\n")
			print(self.df)
		elif(self.choice==6):
			val=input("Enter the value to be inserted in place of NaN : ")
			self.df.fillna(val,inplace=True)
			print("\nDataframe with the inserted value :-\n")
			print(self.df)
		elif(self.choice==7):
			ls=self.df.columns[self.df.isna().any()]
			val=list()
			for x in ls:
				while True:
					print("Enter the value for column ",x," of type ",self.df.dtypes[x]," : ",end=" ")
					v=input()
					if(type(v)==int):
						val.append(int(v))
						break
					elif(type(v)==float):
						val.append(float(v))
						break
					elif(type(v)==str):
						val.append(v)
						break
					else:
						print("Value not supported for the column!")
			for name,value in zip(ls,val):
				self.df.fillna({name:value},inplace=True)
		else:
			print("\nInvalid Choice ! Try Again.\n")
			self.option()
	def check_df(self):
		missing_values = ["n/a","Na","na","--",""," "]
		check=self.df.isna().any().tolist()
		if (True in check):
			print("\nDataset not cleaned properly !")
			print("Some data is still missing.\n")
