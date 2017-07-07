public class CheckingAccount extends Account
{
	 static int numberOfAccount=0;
	 double set=0;
	 public CheckingAccount(double n)
	 {
		 super(n);
		 numberOfAccount++;
	 }
	 public CheckingAccount()
	 {
		 super(0);
		 numberOfAccount++;
	 }
	
	
}
